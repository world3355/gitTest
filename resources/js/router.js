import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './views/Welcome.vue';

Vue.use(Router);

const routes=[
    {
        path:'/',
        name:'welcome',
        component:Welcome
    },
    {
        path:'/categories',
        name:'categories',
        component:()=>import('./views/Categories.vue')
    },
    {
        path:'/userlist',
        name:'userlist',
        component:()=>import('./views/UserList.vue')
    },
    {
        path:'/login',
        name:'login',
        component:()=>import('./views/auth/Login.vue')
    },
    {
        path:'/signselect',
        name:'signselect',
        component:()=>import('./views/auth/SignSelect.vue')
    },
    {
        path:'/usersignup',
        name:'usersignup',
        component:()=>import('./views/auth/UserSignup.vue')
    },
    {
        path:'/companysignup1',
        name:'companysignup1',
        component:()=>import('./views/auth/CompanySignup1.vue')
    },
    {
        path:'/companysignup2',
        name:'companysignup2',
        component:()=>import('./views/auth/CompanySignup2.vue')
    },

    // 오디션
    {
        path:'/audition',
        name:'audition',
        component:()=>import('./views/audition/Audition.vue')
    },
    {
        path: '/auditiondetail/:contentId',
        name: 'AuditionDetail',
        component:()=>import('./views/audition/AuditionDetail.vue')
    },
    {
        path: '/auditioncreate/:contentId?',
        name: 'AuditionCreate',
        component:()=>import('./views/audition/AuditionCreate.vue')
    },
    {
        path: '/auditiontest/:contentId',
        name: 'AuditionTest',
        component:()=>import('./views/audition/AuditionTest.vue')
    },
    // 어플라이 페이지로
    {
        path: '/auditionapply/:contentId/:score',
        name: 'AuditionAppply',
        component:()=>import('./views/audition/AuditionApply.vue')
    },

    //   댄스강좌
    {
        path:'/lecture',
        name:'lecture',
        component:()=>import('./views/lecture/Lecture.vue')
    },
    {
        path:'/lecturePlay/:id',
        name:'LecturePlay',
        component:()=>import('./views/lecture/LecturePlay.vue')
    },
    {
        path:'/expert/list',
        name:'ExpertList',
        component:()=>import('./views/Advice/ExpertList.vue')
    },
    {
        path:'/advice/list',
        name:'AdviceList',
        component:()=>import('./views/Advice/AdviceList.vue')
    },
    {
        path:`/advice/create/:contentId?/:contentName?`,
        name:'AdviceCreate',
        component:()=>import('./views/Advice/AdviceCreate.vue')
    },
    {
        path:`/advice/update/:articleId?/:expertId?`,
        name:'AdviceUpdate',
        component:()=>import('./views/Advice/AdviceCreate.vue')
    },
    {
        path:'/advice/detail/:contentId?/:expertId?',
        name:'AdviceDetail',
        component:()=>import('./views/Advice/AdviceDetail.vue')
    },
    // 마이페이지
    {
        path: '/mypage',
        name: 'mypage',
        component:()=>import('./views/mypage/Mypage.vue'),
        
        children: [
            {
                path: 'profile',
                component:()=>import('./views/mypage/Profile.vue'),
                props: true
            },
            {
                path: 'lecture',
                component:()=>import('./views/mypage/Lecture.vue')
            },
            {
                path: 'apply',
                component:()=>import('./views/mypage/Apply.vue')
            },
            {
                path: 'companyinfo',
                component:()=>import('./views/mypage/CompanyInfo.vue')
            },
            {
                path: 'auditionlist',
                component:()=>import('./views/mypage/AuditionList.vue')
            },
            {
                path: 'profileedit',
                component:()=>import('./views/mypage/ProfileEdit.vue')
            }
        ]
    },
]

const router=new Router({
    routes:routes
});

export default router;