async function fetchProducts(url)
{
    const response = await fetch(url, {
        headers: {
            "Content-Type": "application/json",
            'Accept': 'application/json'
        }
    });
    return await response.json();
}
const fetchOrder = async (url, data) => {
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
        redirect: 'error'
    });
    return await response.json();
}