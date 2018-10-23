import 'bootstrap.native/dist/bootstrap-native-v4';
import Uppy from '@uppy/core';
import Tus from '@uppy/tus';
import Dashboard from '@uppy/dashboard';

const uppy = Uppy({
        resume: true,
        autoRetry: true,
        restrictions: {
            maxFileSize: 10000000,
            maxNumberOfFiles: 3,
            minNumberOfFiles: 1,
            allowedFileTypes: ['image/*'],
        },
    }).use(Dashboard, {
        target: '#select-files',
        inline: true,
        height: 200,
        note: 'Images only, 1–3 files, up to 10 MB',
        showProgressDetails: true,
    })
    .use(Tus, {
        endpoint: '/tus/',
        resume: true,
        autoRetry: true,
        retryDelays: [0, 1000, 3000, 5000],
    })

uppy.on('complete', (result) => {
    console.log(`Upload complete! We’ve uploaded these files: ${result.successful}`)
})
