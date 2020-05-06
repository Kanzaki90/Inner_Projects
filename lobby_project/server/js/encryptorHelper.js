function encrypt(fn, ln) {
    let returnArr = [];
    let x = CryptoJS.AES.encrypt(fn, "salt").toString();
    let y = CryptoJS.AES.encrypt(ln, "salt").toString();

    returnArr[0] = x;
    returnArr[1] = y;

    return returnArr;
}

function decrypt(fn, ln) {
    let returnArr = [];
    let encFn = CryptoJS.AES.decrypt(fn, "salt");
    let decFn = encFn.toString(CryptoJS.enc.Utf8);

    let encLn = CryptoJS.AES.decrypt(ln, "salt");
    let decln = encLn.toString(CryptoJS.enc.Utf8);

    returnArr[0] = decFn;
    returnArr[1] = decln;

    return returnArr;
}