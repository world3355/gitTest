import{http,httpFile} from './http_service';

// 오디션 생성
export function createAudition(data){
    return httpFile().post('/audition', data);
}

// 오디션 리스트 로드
export function loadAudition() {
    return http().get('/audition');
}

// 오디션 상세보기 로드
export function loadDetailAudition(data) {
    let anything="/audition/"+data;
    console.log(anything);
    return http().get(anything);
}

// 오디션 삭제하기
export function deleteAudition(id){
    return http().delete(`audition/${id}`);
}

// 오디션 업데이트하기
export function updateAudition(id,data){
    return httpFile().post(`audition/${id}`,data);

}

// 오디션 지원하기 정보 로드
export function applyAudition(){
    return http().get('/auditionApply');
}

// 오디션 정보제출
export function submitAudition(data){
    return http().post('/auditionApply',data);
}

