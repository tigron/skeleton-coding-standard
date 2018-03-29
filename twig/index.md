# Twig
## Structure
The basic templates are installed under _default directory.
They are included in the template pages using:

	{% extends "_default/layout.base.twig" %}

The main content of the page is inserted in:

	{% block content %}
    
    {% endblock content %}

Regarding to the length of the template, we have two main ways of organizing templates.  For a short template:

	{% extends "_default/layout.base.twig" %}
    
    {% block content %}
    
    {% if action == 'edit' %}
    	// code of edition
    {% else if action == 'create' %}
    	// code of creation
    {% else %}
    	// code of list
    {% endif %}
    
    {% endblock content%}
    
## tables
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