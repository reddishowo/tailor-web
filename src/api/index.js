import axios from "axios";

const Api = axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    "Content-Type": "application/json",
    "Accept": "application/json"
  },
  withCredentials: true
});

// Add response interceptor for error handling
Api.interceptors.response.use(
  response => response,
  error => {
    if (error.response.status === 401) {
    }
    return Promise.reject(error);
  }
);

export default Api;