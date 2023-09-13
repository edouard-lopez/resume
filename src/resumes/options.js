import yaml from 'js-yaml';

import { PERSON } from '../../resume/data.yml';
import { EXPERIENCES } from '../../resume/experiences.yml';
import { NGOS } from '../../resume/ngos.yml';
import { PROJECTS } from '../../resume/projects.yml';
import { PUBLIC_ARTIFACTS } from '../../resume/public-artifacts.yml';
import { terms } from '../terms';

// Called by templates to decrease redundancy
function getVueOptions(name) {
  const opt = {
    name: name,
    data() {
      return {
        person: {
          ...yaml.load(PERSON),
          ...yaml.load(EXPERIENCES),
          ...yaml.load(NGOS),
          ...yaml.load(PROJECTS),
          ...yaml.load(PUBLIC_ARTIFACTS),
        },

        terms: terms,
      };
    },
    computed: {
      lang() {
        const defaultLang = this.terms.en;
        const useLang = this.terms[this.person.lang];

        // overwrite non-set fields with default lang
        Object.keys(defaultLang)
          .filter((k) => !useLang[k])
          .forEach((k) => {
            console.log(k);
            useLang[k] = defaultLang[k];
          });

        return useLang;
      },

      contactLinks() {
        const links = {};

        if (this.person.contact.github) {
          links.github = `https://github.com/${this.person.contact.github}`;
        }

        if (this.person.contact.codefights) {
          links.codefights = `https://codefights.com/profile/${this.person.contact.codefights}`;
        }

        if (this.person.contact.medium) {
          links.medium = `https://medium.com/@${this.person.contact.medium}`;
        }

        if (this.person.contact.email) {
          links.email = `mailto:${this.person.contact.email}`;
        }

        if (this.person.contact.linkedin) {
          links.linkedin = `https://linkedin.com/in/${this.person.contact.linkedin}`;
        }

        if (this.person.contact.phone) {
          links.phone = `tel:${this.person.contact.phone}`;
        }

        return links;
      },
    },
  };
  return opt;
}

export { getVueOptions };
