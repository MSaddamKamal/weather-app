/**
 * A file for managing default configration of Axios and
 * defines Interceptors to intercept Request And Response
 * to carry out certain logic
 */

 import axios from "axios";

 
 const defaultOptions = {
   baseURL: "http://127.0.0.1:8000/", // mock server base url
 
   headers: {
     // default headers
   },
 };
 
 // Create instance
 var instance = axios.create(defaultOptions);
 
 // Set the AUTH token for any request
 instance.interceptors.request.use(function (config) {
   return new Promise((resolve, reject) => {
     resolve(config);
   });
 });
 
 // Add a response interceptor
 instance.interceptors.response.use(
   function (response) {
     return Promise.resolve(response);
   },
   function (error) {
     // Do something with response error
     return Promise.reject(error);
   }
 );
 
 export default instance;
 