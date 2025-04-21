import { Controller } from "@hotwired/stimulus";
import axios from "axios";

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
  // connect() {
  //     // this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
  // console.log("Hola song-controls_controller.js");

  // }

  static values = {
    infoUrl: String,
  };

  play(event) {
    event.preventDefault();
    // console.log(this.infoUrlValue);
    axios //para hacer la llamada Ajax en cada icono de play
      .get(this.infoUrlValue)
      .then((response) => {
        // console.log(response);
        const audio = new Audio(response.data.url);
        audio.play();
      });
  }
}
