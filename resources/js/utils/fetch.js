const fetchBase = ({ url, type }) => ({ token, url: url2, body }) => {
  return fetch(
    `${url2 ? url2 : url}`, // checks if you added url again for pagination
    {
      method: type,
      headers: {
        "Content-Type": "application/json;",
        ...(token ? { Authorization: `Bearer ${token}` } : {}) // adds token if you have one
      },
      ...(body ? { body: JSON.stringify(body) } : {}) // adds body if you have one
    }
  )
    .then(res => res.json())
    .catch(err => {
      console.log("Error at fetch", url, err);
    });
};

export const register = fetchBase({ url: "api/register", type: "POST" });

export const login = fetchBase({ url: "api/signin", type: "POST" });

export const logout = fetchBase({ url: "api/logout", type: "POST" });

export const getPosts = fetchBase({ url: "api/posts", type: "GET" });

export const makePost = fetchBase({ url: "api/post", type: "POST" });
