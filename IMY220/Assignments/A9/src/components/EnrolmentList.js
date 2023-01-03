import React from "react";
import PropTypes from "prop-types";

export class EnrolmentList extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <div>
        <h1>Select a class:</h1>

        <button
          className="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-bs-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          List of classes
        </button>
        <div className="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
          {this.props.classes.map((c) => (
            <div key={c.code} className="p-2">
              <div>{c.name}</div>
            </div>
          ))}
        </div>
      </div>
    );
  }
}
