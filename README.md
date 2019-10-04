# Tailwind for Joomla Gantry

**XT-G5_tailwind** is an hybrid template to leverage Joomla's [Gantry framework](http://gantry.org) on [Tailwind CSS](https://tailwindcss.com/) (the utility-first CSS framework).

## Motivation

In a Joomla context, we are in a transition to modern design practices. Gantry is one of the best template frameworks for Joomla. Gantry's templates come with everything you need and more, "batteries-included". On the other hand, Tailwind CSS is an utility-first CSS framework, the bare minimum toolset (PostCSS) with common-sense definitions to build a powerful CSS framework.

To ease the transition to modern practices, I'm publishing this hybrid template. These are the guidelines of this template and the instructions to do the same on other similar templates:

- Based on Hydrogen Theme
- **Cut the head**: Remove Gantry's rendered HTML head (check the template index.php) 
- **Add the scripts to run Tailwind CSS**: Based on my [anibalsanchez/XT-Tailwind-for-Joomla] template, adapt the scripts to generate the optimized CSS.
- Configure the new HTML head to find the new CSS files and what is needed to fill the requirements of the project.

## Acknowledgements

- [Joomla](https://www.joomla.org/)
- [RocketTheme](http://www.rockettheme.com/)
- [Tailwind CSS](https://tailwindcss.com) - The Utility-First CSS Framework. A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink), David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).
- [Webpack](https://webpack.js.org/)
- [PostCSS](https://postcss.org/)
- [cssnano](https://cssnano.co/)
- [Purgecss](https://www.purgecss.com)

## Copyright & License

- Copyright (c)2007-2019 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE
- This project is dedicated to [Andrea Gentil](http://www.twitter.com/andreagentil) ;-D


