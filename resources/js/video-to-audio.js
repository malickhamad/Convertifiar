import { FFmpeg } from '@ffmpeg/ffmpeg';
import { fetchFile } from '@ffmpeg/util';

const ffmpeg = new FFmpeg();

let ffmpegLoaded = false;

async function loadFFmpeg() {
    if (ffmpegLoaded) return;

    try {
        console.log('FFmpeg: Loading...');

        await ffmpeg.load({
            coreURL: window.location.origin + '/ffmpeg/ffmpeg-core.js',
            wasmURL: window.location.origin + '/ffmpeg/ffmpeg-core.wasm',
            classWorkerURL: window.location.origin + '/ffmpeg/worker.js'
        });

        ffmpegLoaded = true;

        console.log('FFmpeg: Loaded successfully');
    } catch (error) {
        console.error('FFmpeg LOAD ERROR:', error);
        throw error;
    }
}
   
$(function() {           
    const input = $('#videoInput');
    const uploadArea = $('#uploadArea');
    const videoUploadSection = $('#videoUploadSection');
    const videoEditorSection = $('#videoEditorSection');
    const processingSection = $('#processingSection');
    const resultSection = $('#resultSection');
    const progressBar = $('#progressBar');
    const progressText = $('#progressText');
    const progressPercent = $('#progressPercent');

    let selectedFile = null;
    let downloadUrl = null;
    let downloadFilename = 'converted-audio.mp3';

    $('.audio-format-btn').on('click', function() {
        const format = $(this).data('format');

        $('#audioFormat')
            .val(format)
            .trigger('change');
    });

    $('#audioFormat').on('change', function() {
        const format = $(this).val();

        $('.audio-format-btn')
            .removeClass('border-primary');

        $('.audio-format-btn[data-format="' + format + '"]')
            .addClass('border-primary');
    });

    $('#audioFormat').trigger('change');

    input.on('change', function() {
        const file = this.files[0];

        if (!file) {
            return;
        }

        const validVideo =
            file.type.startsWith('video/') ||
            /\.(mp4|mov|avi|webm|mkv|mpeg|mpg|flv|3gp)$/i
            .test(file.name);

        if (!validVideo) {
            alert('Please select a valid video file.');
            reset();
            return;
        }

        if (file.size > 50 * 1024 * 1024) {
            alert('Video size must not exceed 50MB.');
            reset();
            return;
        }

        selectedFile = file;

        $('#fileName').text(file.name);
        $('#fileSize').text(formatSize(file.size));

        videoUploadSection.addClass('d-none');
        videoEditorSection.removeClass('d-none');
        processingSection.addClass('d-none');
        resultSection.addClass('d-none');

        scrollToSection(videoEditorSection);
    });

    uploadArea.on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $(this).addClass('border-primary');
    });

    uploadArea.on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $(this).removeClass('border-primary');
    });

    uploadArea.on('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();

        $(this).removeClass('border-primary');

        const files = e.originalEvent.dataTransfer.files;

        if (!files.length) {
            return;
        }

        input[0].files = files;
        input.trigger('change');
    });

    $('#removeFile').on('click', function() {
        reset();
        scrollToSection(videoUploadSection);
    });

    $('#convertBtn').on('click', async function() {
        if (!selectedFile) {
            alert('Please select a video first.');
            return;
        }

        const button = $(this);
        const format = $('#audioFormat').val();

        button
            .prop('disabled', true)
            .html(
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Preparing...'
            );

        videoEditorSection.addClass('d-none');
        resultSection.addClass('d-none');
        processingSection.removeClass('d-none');

        scrollToSection(processingSection);

        setProgress(
            0,
            'Preparing conversion...'
        );

        try {
            await loadFFmpeg();

            ffmpeg.on('progress', ({ progress }) => {
                const percent = Math.max(
                    1,
                    Math.min(
                        99,
                        Math.round(progress * 100)
                    )
                );

                setProgress(
                    percent,
                    percent < 50
                        ? 'Extracting audio...'
                        : 'Processing audio...'
                );
            });

            setProgress(
                5,
                'Loading video...'
            );

            const extension =
                getExtension(selectedFile.name) || 'mp4';

            const inputName =
                `input.${extension}`;

            const outputName =
                `output.${format}`;

            await ffmpeg.writeFile(
                inputName,
                await fetchFile(selectedFile)
            );

            setProgress(
                10,
                'Starting conversion...'
            );

            if (format === 'mp3') {
                await ffmpeg.exec([
                    '-i',
                    inputName,
                    '-vn',
                    '-c:a',
                    'libmp3lame',
                    '-b:a',
                    '192k',
                    '-ar',
                    '44100',
                    '-ac',
                    '2',
                    outputName
                ]);
            }

            if (format === 'wav') {
                await ffmpeg.exec([
                    '-i',
                    inputName,
                    '-vn',
                    '-c:a',
                    'pcm_s16le',
                    '-ar',
                    '44100',
                    '-ac',
                    '2',
                    outputName
                ]);
            }

            if (format === 'm4a') {
                await ffmpeg.exec([
                    '-i',
                    inputName,
                    '-vn',
                    '-c:a',
                    'aac',
                    '-b:a',
                    '192k',
                    '-ar',
                    '44100',
                    '-ac',
                    '2',
                    '-movflags',
                    '+faststart',
                    outputName
                ]);
            }

            const data = await ffmpeg.readFile(
                outputName
            );

            if (!data || !data.length) {
                throw new Error(
                    'The converted audio file is empty.'
                );
            }

            const mimeTypes = {
                mp3: 'audio/mpeg',
                wav: 'audio/wav',
                m4a: 'audio/mp4'
            };

            const blob = new Blob(
                [data.buffer],
                {
                    type:
                        mimeTypes[format] ||
                        'application/octet-stream'
                }
            );

            downloadUrl =
                URL.createObjectURL(blob);

            const originalName =
                selectedFile.name
                    .replace(/\.[^/.]+$/, '');

            downloadFilename =
                `${originalName}.${format}`;

            setProgress(
                100,
                'Conversion completed'
            );

            setTimeout(function() {
                processingSection.addClass('d-none');
                resultSection.removeClass('d-none');

                button
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-bolt me-2"></i>' +
                        'Convert Video to Audio'
                    );

                scrollToSection(resultSection);
            }, 500);

            await cleanupFFmpegFiles(
                inputName,
                outputName
            );

        } catch (error) {
            console.error(
                'FFmpeg Conversion Error:',
                error
            );

            showError(
                error.message ||
                'Unable to convert the video. Please try again.'
            );
        }
    });

    $('#downloadBtn').on('click', function(e) {
        e.preventDefault();

        if (!downloadUrl) {
            alert(
                'Download link is not available.'
            );
            return;
        }

        const button = $(this);

        const oldText = button.html();

        button
            .prop('disabled', true)
            .html(
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Downloading...'
            );

        try {
            const link =
                document.createElement('a');

            link.href = downloadUrl;
            link.download = downloadFilename;
            link.style.display = 'none';

            document.body.appendChild(link);

            link.click();

            link.remove();

        } catch (error) {
            console.error(
                'Download Error:',
                error
            );

            alert(
                'Unable to download the audio file.'
            );
        } finally {
            setTimeout(function() {
                button
                    .prop('disabled', false)
                    .html(oldText);
            }, 500);
        }
    });

    $('#newVideoBtn').on('click', function() {
        reset();
        scrollToSection(videoUploadSection);
    });

    function setProgress(percent, message) {
        progressBar
            .css('width', percent + '%')
            .attr(
                'aria-valuenow',
                percent
            );

        progressText.text(message);
        progressPercent.text(percent + '%');
    }

    function showError(message) {
        processingSection.addClass('d-none');
        videoEditorSection.removeClass('d-none');

        $('#convertBtn')
            .prop('disabled', false)
            .html(
                '<i class="fas fa-bolt me-2"></i>' +
                'Convert Video to Audio'
            );

        setProgress(
            0,
            'Conversion failed'
        );

        alert(message);

        scrollToSection(videoEditorSection);
    }

    async function cleanupFFmpegFiles(
        inputName,
        outputName
    ) {
        try {
            await ffmpeg.deleteFile(
                inputName
            );
        } catch (error) {}

        try {
            await ffmpeg.deleteFile(
                outputName
            );
        } catch (error) {}
    }

    function getExtension(filename) {
        const parts =
            filename.split('.');

        if (parts.length < 2) {
            return '';
        }

        return parts
            .pop()
            .toLowerCase();
    }

    function reset() {
        selectedFile = null;

        if (downloadUrl) {
            URL.revokeObjectURL(
                downloadUrl
            );
        }

        downloadUrl = null;
        downloadFilename =
            'converted-audio.mp3';

        input.val('');

        videoUploadSection
            .removeClass('d-none');

        videoEditorSection
            .addClass('d-none');

        processingSection
            .addClass('d-none');

        resultSection
            .addClass('d-none');

        $('#convertBtn')
            .prop('disabled', false)
            .html(
                '<i class="fas fa-bolt me-2"></i>' +
                'Convert Video to Audio'
            );

        setProgress(
            0,
            'Starting conversion...'
        );

        $('#fileName').text(
            'Selected video'
        );

        $('#fileSize').text(
            '0 Bytes'
        );

        $('#audioFormat')
            .val('mp3')
            .trigger('change');
    }

    function formatSize(bytes) {
        if (!bytes) {
            return '0 Bytes';
        }

        const units = [
            'Bytes',
            'KB',
            'MB',
            'GB'
        ];

        const index =
            Math.floor(
                Math.log(bytes) /
                Math.log(1024)
            );

        return (
            bytes /
            Math.pow(
                1024,
                index
            )
        ).toFixed(2) +
        ' ' +
        units[index];
    }

    function scrollToSection(section) {
        if (!section.length) {
            return;
        }

        $('html, body').animate({
            scrollTop:
                section.offset().top - 85
        }, 450);
    }
});