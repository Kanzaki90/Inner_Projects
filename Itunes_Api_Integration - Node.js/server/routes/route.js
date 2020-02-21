const express = require("express");
const router = express.Router()
const controller = require("../controllers/controller");

router.get("/search", controller.search);
router.get("/getAlbums", controller.getAlbums);
router.get("/getArtists", controller.getArtists);

module.exports = router;




