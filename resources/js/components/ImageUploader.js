import Uppy from '@uppy/core';
import XHRUpload from '@uppy/xhr-upload';
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
}).use(XHRUpload, {
    endpoint: '/images/',
    fieldName: 'image',
    metaFields: ['name'],
    headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
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
