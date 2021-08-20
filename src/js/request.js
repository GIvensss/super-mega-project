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