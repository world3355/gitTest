import {http, httpFile} from './http_service';

export function checkSession() {
    return http().get('/sessions');
}

export function createSession(data) {

    return http().post('/sessions', data);
}

export function deleteSession() {
    return http().delete('/sessions/1');
}

// export function loadCategories() {

//     return http().get('/categories');
// }