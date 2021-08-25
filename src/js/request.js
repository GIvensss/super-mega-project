const fetchGet = async (url) => {
    const response = await fetch(url, {
        headers: {
            "Content-Type": "application/json",
            'Accept': 'application/json'
        }
    });
    return await response.json();
}

const fetchPost = async (url, data) => {
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    });
    return await response.json();
}