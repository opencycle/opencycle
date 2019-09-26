import Uppy from '@uppy/core';
import Tus from '@uppy/tus';
import { Dashboard } from '@uppy/react';
import Form from '@uppy/form';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const uppy = Uppy({
    resume: true,
    autoRetry: true,
    restrictions: {
        maxFileSize: 5000000,
        maxNumberOfFiles: 3,
        allowedFileTypes: ['image/*'],
    },
}).use(Tus, {
    endpoint: '/tus/',
    resume: true,
    autoRetry: true,
    retryDelays: [0, 1000, 3000, 5000],
});

export default class ImageUploader extends Component {
    render() {
        uppy.use(Form, {
            target: '#post-create',
            addResultToForm: true,
            resultName: 'images',
        });

        return (
            <Dashboard
                uppy={ uppy }
                inline
                height={ 200 }
                note='Images only, up to 5 MB'
                showProgressDetails
            />
        );
    }
}

if (document.getElementById('image-uploader')) {
    ReactDOM.render(<ImageUploader />, document.getElementById('image-uploader'));
}
