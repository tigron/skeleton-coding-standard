# Twig

## Structure

The base templates can be found in the `_default` directory. You can include
include them in your actual templates like so:

	{% extends "_default/layout.base.twig" %}

The main content of the page is inserted in:

	{% block content %}

	{% endblock content %}

In an attempt to help you keep the size of your templates under control, there
are two commonly used ways of organising templates. Example of a short template:

	{% extends "_default/layout.base.twig" %}

	{% block content %}

	{% if action == 'edit' %}
		// code handling editing of the object
	{% else if action == 'create' %}
		// code creating the object
	{% else %}
		// code listing the objects
	{% endif %}

	{% endblock content%}

## Tables

Tables are drawn using the following structure:

	{% for object in objects %}
		{% if loop.first %}
			{# header of the table #}
		{% endif %}
		{# any row of the table #}
		{% if loop.last %}
			{# footer/closing of the table #}
		{% endif %}
	{% else %}
		{# code when no objects available #}
	{% endfor %}

## Translations

When adding a string to a template, make sure it is translatable. We support
three different ways of doing so:

    {% trans %}Welcome to my awesome application.{% endtrans %}

    {% trans "Welcome to my awesome application." %}

    {{ "Welcome to my awesome application."|trans }}

Try to adhere to the guidelines below:

* Always include puncuation when it makes sense.
* Avoid splitting scentences over multiple `trans` tags or pipes.

If you need to include a variable in your string, use placeholders. Placeholders
follow the `sprintf` notation.

    {{ "Hello %s, and welcome to my awesome application."|trans|format(name) }}
