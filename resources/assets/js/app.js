import 'bootstrap.native/dist/bootstrap-native-v4';
import Uppy from '@uppy/core';
import Dashboard from '@uppy/dashboard';
import XHRUpload from '@uppy/xhr-upload';

const uppy = Uppy()
    .use(Dashboard, {
        trigger: '#select-files'
    })
    .use(XHRUpload, {
        endpoint: '/posts/image'
    })

uppy.on('complete', (result) => {
    console.log(`Upload complete! We’ve uploaded these files: ${result.successful}`)
})
