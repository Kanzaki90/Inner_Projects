const path = require("path");
const express = require("express");
const app = express();

const routes = require("./routes/route");

try {

    // initial page -> index.html
    const publicDirectory = path.join(__dirname, "../public");

    app.use(express.static(publicDirectory));
    app.use("/" ,routes);

    app.listen(3001, () => {
        console.log("Host is up on port 3001");
    });
}

catch (e) {
    console.log(e);
}