# Tailwind CSS for Joomla Gantry

**XT-G5_tailwind** is an hybrid template to leverage Joomla's [Gantry framework](http://gantry.org) on [Tailwind CSS](https://tailwindcss.com/) (the utility-first CSS framework).

## Motivation

In a Joomla context, we are in a transition to modern design practices. Gantry is one of the best template frameworks for Joomla. Gantry's templates come with everything you need and more, "batteries-included". On the other hand, Tailwind CSS is a utility-first CSS framework, the bare minimum toolset (PostCSS) with common-sense definitions to build a robust CSS framework.

To ease the transition to modern practices, I'm publishing this hybrid template. These are the guidelines of this template and the instructions to do the same on other similar templates:

- Based on Hydrogen Theme
- **Cut the head**: Remove Gantry's rendered HTML head (check the template index.php). The idea is removing all the Joomla and Gantry default scripts and styles. *Yes, totally backwards-incompatible changes*.
- **Add the scripts to run Tailwind CSS**: Based on my [anibalsanchez/XT-Tailwind-for-Joomla](https://github.com/anibalsanchez/XT-Tailwind-for-Joomla) template, adapt the scripts to generate the optimized CSS.
- Configure the new HTML head to find the new CSS files and what is needed to fill the requirements of the project.
- Of course, all scripts and styles must be defined ad-hoc, or with a different [Document Assets Renderer](https://github.com/anibalsanchez/XT-Tailwind-for-Joomla/blob/master/template/XTHtmlAssetsRenderer.php).

The final objective is creating templates that can exist side by side with full templates and migrate pages to the new optimized structure. It is not a perfect solution (it requires manual tasks to migrate scripts and styles), but it is what we can do to migrate the current generation of sites incrementally.

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


