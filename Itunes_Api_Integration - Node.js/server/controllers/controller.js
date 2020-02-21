const request = require("request");

const searchURL = "https://itunes.apple.com/search?";
const lookupURL = "https://itunes.apple.com/lookup?";

function makeRequest(url) {

    return new Promise((resolve, reject) => {

        request({ url: url }, (error, responde) => {

            if (error) {
                reject(error);
            } else {
                const data = JSON.parse(responde.body);
                resolve(data);
            }

        });

    });
}

async function _search(req, res) {

    let query = req.query;

    if (typeof query.term === "undefined" || !query.term || query.term.length === 0) {

        return res.send({
            error: 'An error accured with the please enter a valid search'
        });
    }

    let url = searchURL + "term=" + query.term;

    let returnObj = {};

    try {

        if (Object.entries(query).length > 1) {
            delete query.term;

            for (const property in query) {
                url += "&" + property + "=" + query[property];
            }
        }

        url = encodeURI(url);
        const data = await makeRequest(url);
        console.log(data.results[0]);
        returnObj["artistId"] = data.results[0].artistId;
        returnObj["artistName"] = data.results[0].artistName;
        returnObj["data"] = data.results;

    }
    catch (e) {
        returnObject["amgArtistId"] = null;
        returnObject["data"] = null;
    }
    finally {
        return res.send(returnObj);
    }

}

async function _getAlbums(req, res) {
    
    let query = req.query;

    if (typeof query.id === "undefined" || !query.id || query.id.length === 0) {
        return res.send({ error: "An ID must be provided! Please fill in the artist in order to continue." });
    }

    if (typeof query.entity === "undefined" || !query.entity ||
        query.entity.length === 0 || query.entity !== "album") {

        return res.send({ error: "You must choose the ammount of albums You wish to receive." });
    }

    let url = lookupURL + "id=" + query.id + "&entity=" + query.entity;
    let returnObject = {};

    try {

        if (Object.entries(query) !== 2) {

            delete query.id;
            delete query.entity;

            for (const property in query) {
                url += "&" + property + "=" + query[property];
            }

        }

        url = encodeURI(url);
        const data = await makeRequest(url);
        returnObject["amgArtistId"] = data.results[0].amgArtistId;
        returnObject["data"] = data.results;

    } catch (e) {
        returnObject["amgArtistId"] = null;
        returnObject["data"] = null;
    } finally {
        return res.send(returnObject);
    }
}

async function _getArtists(req, res) {

    let query = req.query;

    if (typeof query.amgArtistId === "undefined" || !query.amgArtistId || query.amgArtistId.length === 0) {
        return res.send({ error: "Please fill in the inittal data -> (I)Artist name (for the ID), (II) Ammount of albums You seek)." });
    }

    let url = encodeURI(lookupURL + "amgArtistId=" + query.amgArtistId);
    let returnObject = {};

    try {
        const data = await makeRequest(url);
        returnObject["data"] = data.results;
        console.log(returnObject);

    } catch (e) {
        returnObject["data"] = null;
    } finally {
        return res.send(returnObject);
    }

}

module.exports = {
    search: _search,
    getAlbums: _getAlbums,
    getArtists: _getArtists
}

