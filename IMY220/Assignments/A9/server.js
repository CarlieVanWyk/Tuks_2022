import express from "express";
import http from "http";
import socketIo from "socket.io";
const app = express();

//SERVE A STATIC PAGE IN THE PUBLIC DIRECTORY
app.use(express.static("public"));
const server = http.createServer(app);
const io = socketIo(server);

const { MongoClient } = require("mongodb");
const uri =
  "mongodb+srv://MonDbUser:LETmondb%2346bleh@demo.8r2o3n8.mongodb.net/?retryWrites=true&w=majority";
const client = new MongoClient(uri);

import "regenerator-runtime/runtime";

server.listen(3000, async () => {
  let results = await runFindQuery(
    "classes",
    {},
    { projection: { name: 1, code: 1 } }
  );
  // do something with results
  results.forEach((result) => {
    console.log("name: " + result.name + ", code: " + result.code);
  });
  io.on("connection", (socket) => {
    socket.emit("classes", results);
  });
  console.log("listening on *:3000");
});

async function runFindQuery(collection, query, projection) {
  try {
    await client.connect();
    const database = client.db("DBExample");
    const col = database.collection(collection);
    const cursor = col.find(query, projection);
    return await cursor.toArray();
  } finally {
    await client.close();
  }
}

// const express = require("express");
// // import express from "express";

// //CREATE APP
// const app = express();

// //SERVE A STATIC PAGE IN THE PUBLIC DIRECTORY
// app.use(express.static("public"));

// //PORT TO LISTEN TO
// app.listen(1337, () => {
//   console.log("Listening on localhost:1337");
// });
