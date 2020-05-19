import{http,httpFile} from './http_service';

export function createFeedback(data){
    return httpFile().post('/feedback', data);
}

export function loadFeedback() {
    return http().get('/feedback');
}

export function loadFeedbackList() {
    return http().get('/feedback/list');
}

export function loadDetailFeedback(cid,eid) {
    let anything="/feedback/test/"+cid+"/"+eid;
    return http().get(anything);
    // return httpFile().post('/feedback/test',cid,eid);
}

export function updateFeedback(aid,data){
    return httpFile().post(`/feedback/${aid}`,data);
}


