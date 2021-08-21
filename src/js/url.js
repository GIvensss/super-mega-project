const getId = () => {
    let url = window.location.href.split('/');
    return url.pop();
}