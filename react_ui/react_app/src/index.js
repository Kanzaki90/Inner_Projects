import React from "react";
import ReactDom from "react-dom";
import "./index.css";

// stateless functional component
// always returns JSX

const btnText = "Big Button";

function Person() {
  const btn = "search button";
  const name = "John";
  const lastName = "Doe";
  return (
    <section>
      <button>{btnText}</button>
      {/* <h2>{name + " " + lastName}</h2> */}
      <h2>{name + " " + lastName}</h2>

      <p>Info</p>
      <p></p>
    </section>
  );
}

// 1 - What we are passing, 2) who's going to render it
ReactDom.render(<Person />, document.getElementById("root"));
