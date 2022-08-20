import { events } from "./script.js";
/*
class EventHandler {
  constructor(events) {
    this.myEvents = events;
  }

  getEventsBetweenDates(start, end) {
    let eventsBetweenDates = [];
    this.myEvents.filter((event) => {
      if (event.dateStart >= start && event.dateEnd <= end) {
        eventsBetweenDates.push(event);
      }
    });
    return eventsBetweenDates;
  }

  getByMonth(month) {
    let eventsByMonth = [];
    this.myEvents.filter((event) => {
      if (event.dateStart.split("/")[1] == month) {
        eventsByMonth.push(event);
      }
    });
    return eventsByMonth;
  }

  getUniqueDateAndSort() {
    // returns an array that is sorted by month of the starting date
    let uniqueDates = [];
    uniqueDates = this.myEvents.sort((a, b) => {
      return a.dateStart.split("/")[1] - b.dateStart.split("/")[1];
    });

    // remove duplicates
    uniqueDates = uniqueDates.filter((event, index, self) => {
      return (
        index ===
        self.findIndex(
          (t) =>
            t.dateStart.split("/")[2] === event.dateStart.split("/")[2] &&
            t.dateStart.split("/")[1] === event.dateStart.split("/")[1] &&
            t.dateStart.split("/")[0] === event.dateStart.split("/")[0] &&
            t.dateEnd.split("/")[2] === event.dateEnd.split("/")[2] &&
            t.dateEnd.split("/")[1] === event.dateEnd.split("/")[1] &&
            t.dateEnd.split("/")[0] === event.dateEnd.split("/")[0]
        )
      );
    });
    return uniqueDates;
  }

  getSummary() {
    let summary = [];
    if (arguments.length == 0) {
      //summarize this.myEvents (push, forEach)
      this.myEvents.forEach((event) => {
        if (event.dateStart == event.dateEnd) {
          var str =
            "On " +
            event.dateStart +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            event.dateStart +
            " to " +
            event.dateEnd +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        }
      });
    } else if (arguments.length == 1) {
      //summarize the given array
      arguments[0].forEach((event) => {
        if (event.dateStart == event.dateEnd) {
          var str =
            "On " +
            event.dateStart +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            event.dateStart +
            " to " +
            event.dateEnd +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        }
      });
    } else {
      //summarize the given objects
      for (var i = 0; i < arguments.length; i++) {
        if (arguments[i].dateStart == arguments[i].dateEnd) {
          var str =
            "On " +
            arguments[i].dateStart +
            ": " +
            arguments[i].name +
            " (" +
            arguments[i].description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            arguments[i].dateStart +
            " to " +
            arguments[i].dateEnd +
            ": " +
            arguments[i].name +
            " (" +
            arguments[i].description +
            ")";
          summary.push(str);
        }
      }
    }

    return summary;
  }
}
*/

function EventHandler() {
  this.myEvents = events;

  this.getEventsBetweenDates = function (start, end) {
    let eventsBetweenDates = [];
    this.myEvents.filter((event) => {
      if (event.dateStart >= start && event.dateEnd <= end) {
        eventsBetweenDates.push(event);
      }
    });
    return eventsBetweenDates;
  };

  this.getByMonth = function (month) {
    let eventsByMonth = [];
    this.myEvents.filter((event) => {
      if (event.dateStart.split("/")[1] == month) {
        eventsByMonth.push(event);
      }
    });
    return eventsByMonth;
  };

  this.getUniqueDateAndSort = function () {
    // returns an array that is sorted by month of the starting date
    let uniqueDates = [];
    uniqueDates = this.myEvents.sort((a, b) => {
      return a.dateStart.split("/")[1] - b.dateStart.split("/")[1];
    });

    // remove duplicates
    uniqueDates = uniqueDates.filter((event, index, self) => {
      return (
        index ===
        self.findIndex(
          (t) =>
            t.dateStart.split("/")[2] === event.dateStart.split("/")[2] &&
            t.dateStart.split("/")[1] === event.dateStart.split("/")[1] &&
            t.dateStart.split("/")[0] === event.dateStart.split("/")[0] &&
            t.dateEnd.split("/")[2] === event.dateEnd.split("/")[2] &&
            t.dateEnd.split("/")[1] === event.dateEnd.split("/")[1] &&
            t.dateEnd.split("/")[0] === event.dateEnd.split("/")[0]
        )
      );
    });
    return uniqueDates;
  };

  this.getSummary = function () {
    let summary = [];
    if (arguments.length == 0) {
      //summarize this.myEvents (push, forEach)
      this.myEvents.forEach((event) => {
        if (event.dateStart == event.dateEnd) {
          var str =
            "On " +
            event.dateStart +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            event.dateStart +
            " to " +
            event.dateEnd +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        }
      });
    } else if (arguments.length == 1) {
      //summarize the given array
      arguments[0].forEach((event) => {
        if (event.dateStart == event.dateEnd) {
          var str =
            "On " +
            event.dateStart +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            event.dateStart +
            " to " +
            event.dateEnd +
            ": " +
            event.name +
            " (" +
            event.description +
            ")";
          summary.push(str);
        }
      });
    } else {
      //summarize the given objects
      for (var i = 0; i < arguments.length; i++) {
        if (arguments[i].dateStart == arguments[i].dateEnd) {
          var str =
            "On " +
            arguments[i].dateStart +
            ": " +
            arguments[i].name +
            " (" +
            arguments[i].description +
            ")";
          summary.push(str);
        } else {
          var str =
            "From " +
            arguments[i].dateStart +
            " to " +
            arguments[i].dateEnd +
            ": " +
            arguments[i].name +
            " (" +
            arguments[i].description +
            ")";
          summary.push(str);
        }
      }
    }

    return summary;
  };
}

Array.prototype.getEventsBetweenDates = function (start, end) {
  let eventsBetweenDates = [];
  events.filter((event) => {
    if (event.dateStart >= start && event.dateEnd <= end) {
      eventsBetweenDates.push(event);
    }
  });
  return eventsBetweenDates;
};

Array.prototype.getByMonth = function (month) {
  let eventsByMonth = [];
  events.filter((event) => {
    if (event.dateStart.split("/")[1] == month) {
      eventsByMonth.push(event);
    }
  });
  return eventsByMonth;
};

Array.prototype.getUniqueDateAndSort = function () {
  // returns an array that is sorted by month of the starting date
  let uniqueDates = [];
  uniqueDates = events.sort((a, b) => {
    return a.dateStart.split("/")[1] - b.dateStart.split("/")[1];
  });

  // remove duplicates
  uniqueDates = uniqueDates.filter((event, index, self) => {
    return (
      index ===
      self.findIndex(
        (t) =>
          t.dateStart.split("/")[2] === event.dateStart.split("/")[2] &&
          t.dateStart.split("/")[1] === event.dateStart.split("/")[1] &&
          t.dateStart.split("/")[0] === event.dateStart.split("/")[0] &&
          t.dateEnd.split("/")[2] === event.dateEnd.split("/")[2] &&
          t.dateEnd.split("/")[1] === event.dateEnd.split("/")[1] &&
          t.dateEnd.split("/")[0] === event.dateEnd.split("/")[0]
      )
    );
  });
  return uniqueDates;
};

Array.prototype.getSummary = function () {
  if (this.constructor === Array) {
    return this.map((event) => {
      if (event.dateStart === event.dateEnd) {
        var str =
          "On " +
          event.dateStart +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        return str;
      } else {
        var str =
          "From " +
          event.dateStart +
          " to " +
          event.dateEnd +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        return str;
      }
    });
  }
  let summary = [];
  if (arguments.length == 0) {
    //summarize this.myEvents (push, forEach)
    events.forEach((event) => {
      if (event.dateStart == event.dateEnd) {
        var str =
          "On " +
          event.dateStart +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        summary.push(str);
      } else {
        var str =
          "From " +
          event.dateStart +
          " to " +
          event.dateEnd +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        summary.push(str);
      }
    });
  } else if (arguments.length == 1) {
    //summarize the given array
    arguments[0].forEach((event) => {
      if (event.dateStart == event.dateEnd) {
        var str =
          "On " +
          event.dateStart +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        summary.push(str);
      } else {
        var str =
          "From " +
          event.dateStart +
          " to " +
          event.dateEnd +
          ": " +
          event.name +
          " (" +
          event.description +
          ")";
        summary.push(str);
      }
    });
  } else {
    //summarize the given objects
    for (var i = 0; i < arguments.length; i++) {
      if (arguments[i].dateStart == arguments[i].dateEnd) {
        var str =
          "On " +
          arguments[i].dateStart +
          ": " +
          arguments[i].name +
          " (" +
          arguments[i].description +
          ")";
        summary.push(str);
      } else {
        var str =
          "From " +
          arguments[i].dateStart +
          " to " +
          arguments[i].dateEnd +
          ": " +
          arguments[i].name +
          " (" +
          arguments[i].description +
          ")";
        summary.push(str);
      }
    }
  }

  return summary;
};

console.log(events);

var test = new EventHandler(events);
// console.log(test.getEventsBetweenDates("2022/02/01", "2022/02/16"));
// console.log(test.getByMonth("05"));
// console.log(test.getUniqueDateAndSort());
// console.log(test.getSummary(events));
console.log(test.getByMonth("06").getSummary());
