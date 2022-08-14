//Carlie van wyk u21672823

//The packages you will be using:
let express = require("express/");
let bodyParser = require("body-parser");
let fs = require("fs");

//The type of application we are declaring:
let app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extend: false }));
let routes = require("./routes.js")(app, fs);

//The port you want to run your application:
let port = process.env.PORT || 3000;
app.listen(port);
console.log("Servering running on port " + port);

//Lastly, some way to test our server:
app.get("/", function (request, respond) {
  respond.send("Hello, World!");
});

//____________________________________________________________get
app.get("/data", (request, respond) => {
  fs.readFile(data_file, (error, rdata) => {
    if (error) {
      throw error;
    }
    respond.send(JSON.parse(rdata)); //parse: JSON string to JS object
  });
});
//____________________________________________________________get id
app.get("/data/:id", (request, respond) => {
  console.log("here");
  fs.readFile(data_file, (error, rdata) => {
    if (error) {
      throw error;
    }

    let ID = request.params["id"];
    console.log(ID);
    // let ID = tmpId.substring(0);

    let arr = JSON.parse(rdata);
    let checkPresent = false;

    for (let i = 0; i < rdata.length; i++) {
      if (arr[i]["id"] == ID) {
        respond.send(JSON.stringify(arr[i]));
        checkPresent = true;
      }
    }

    if (checkPresent == false) {
      respond.send(null);
    }
  });
});

//_______________________________________________________________post
app.post("/data", (request, respond) => {
  let arr;
  fs.readFile(data_file, (error, rdata) => {
    if (error) {
      throw error;
    }

    //Retrieve the data from the request
    arr = JSON.parse(rdata);

    //get the location of where to add the new object
    let newObjPlace = arr.length;

    //append the new data from the request
    arr[newObjPlace] = request.body;

    //writeFile function
    //transform the data from an object to plain text before writing into the file
    let new_data = JSON.stringify(arr);
    fs.writeFile(data_file, new_data, (error) => {
      if (error) {
        throw error;
      }
      respond.send(new_data);
    });
  });
});

//_______________________________________________________________put
app.put("/data/:id", (request, respond) => {
  let arr;
  fs.readFile(data_file, (error, rdata) => {
    if (error) {
      throw error;
    }

    //Retrieve the data from the request
    arr = JSON.parse(rdata);

    //get the location of where to update
    let ID = request.params["id"];
    // let ID = tmpId.substring(0);
    let checkPresent = false;
    let newObjPlace;
    for (let i = 0; i < arr.length; i++) {
      if (arr[i]["id"] == ID) {
        checkPresent = true;
        newObjPlace = i;
      }
    }
    if (checkPresent == false) {
      respond.send(null);
    }

    //update arr[i] with the new data from the request
    arr[newObjPlace] = request.body;

    //writeFile function
    //transform the data from an object to plain text before writing into the file
    let new_data = JSON.stringify(arr);
    fs.writeFile(data_file, new_data, (error) => {
      if (error) {
        throw error;
      }
      respond.send(new_data);
    });
  });
});

//_______________________________________________________________delete
app.delete("/data/:id", (request, respond) => {
  let arr;
  fs.readFile(data_file, (error, rdata) => {
    if (error) {
      throw error;
    }

    //Retrieve the data from the request
    arr = JSON.parse(rdata);

    //get the location of where to delete
    let ID = request.params["id"];
    // let ID = tmpId.substring(0);
    let checkPresent = false;
    let deleteObjPlace;
    for (let i = 0; i < arr.length; i++) {
      if (arr[i]["id"] == ID) {
        checkPresent = true;
        deleteObjPlace = i;
      }
    }
    if (checkPresent == false) {
      respond.send(null);
    }

    //delete specified id from request
    arr.splice(deleteObjPlace, 1);

    //writeFile function
    //transform the data from an object to plain text before writing into the file
    let new_data = JSON.stringify(arr);
    fs.writeFile(data_file, new_data, (error) => {
      if (error) {
        throw error;
      }
      respond.send(new_data);
    });
  });
});
