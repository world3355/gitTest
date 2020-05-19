import {http, httpFile} from './http_service';

export function loadHomeContents() {
    
    return http().get('/');
}