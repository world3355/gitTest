import {http, httpFile} from './http_service';

export function createUser(data) {

    return http().post('/users', data);
}

// export function loadCategories() {

//     return http().get('/categories');
// }