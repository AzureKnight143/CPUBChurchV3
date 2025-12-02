import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
  faFacebookF,
  faInstagram,
  faXTwitter,
  faYoutube,
} from "@fortawesome/free-brands-svg-icons";
import "bootstrap/js/dist/collapse";
import "understrap/src/js/skip-link-focus-fix";
import "./newsletter-validation";

library.add(faFacebookF, faInstagram, faYoutube, faXTwitter);
dom.watch();
