import 'bootstrap.native/dist/bootstrap-native-v4';
import Uppy from '@uppy/core';
import Tus from '@uppy/tus';
import Dashboard from '@uppy/dashboard';
import Form from '@uppy/form';

Uppy({
    resume: true,
    autoRetry: true,
    restrictions: {
        maxFileSize: 5000000,
        maxNumberOfFiles: 3,
        allowedFileTypes: ['image/*'],
    },
}).use(Dashboard, {
    target: '#select-files',
    inline: true,
    height: 200,
    note: 'Images only, up to 5 MB',
    showProgressDetails: true,
})
.use(Tus, {
    endpoint: '/tus/',
    resume: true,
    autoRetry: true,
    retryDelays: [0, 1000, 3000, 5000],
}).use(Form, {
    target: '#post-create',
    addResultToForm: true,
    resultName: 'images',
});
