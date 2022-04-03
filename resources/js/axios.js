import axios from 'axios';
import store from './vuex';

const instance = axios.create({
    withCredentials: true
});

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

instance.interceptors.request.use(
    config => {
        config.headers['Authorization'] = `Bearer ${store.getters['auth/token']}`;
        config.headers['Accept'] = 'application/json';
        config.headers['Content-Type'] = 'application/json';
        return config;
    },
    error => {
        Promise.reject(error);
    }
);
export default instance;
