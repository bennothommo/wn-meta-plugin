# Meta plugin

Provides an easy interface to allow October CMS plugins to insert HTML `<meta>` and `<link>` tags into a layout or page. The plugin provides two helper classes to populate the meta and link tags, and a component to inject them into an October CMS layout, partial or page file.

## Usage

### For theme developers

#### Meta tags

Two components are provided to inject the meta and link tags into your theme - **metaList** and **linkList**.

Add the **Meta -> Meta List** component to your page and add the following line where you would like the meta tags to be inserted. This should preferably be inside the `<head>` tag.

```
{% component 'metaList' %}
```

Meta tags will be generated in the following structure:

```
<meta name="(name)" content="(value)">
```

Two options are also provided with the component:

- **Include page meta?**: If ticked (default), the meta title and description fields provided by October CMS will be also be included in the generated meta tags.
- **Escape tag values?**: If ticked (default), the values inserted into the `content` attribute will be escaped using `htmlentities`. If this messes up your content, you can untick this to insert the raw content instead.

#### Link tags

Add the **Meta -> Link List** component to your page and add the following line where you would like the link tags to be inserted. As above, this should also preferably be inside the `<head>` tag.

```
{% component 'linkList' %}
```

Link tags will be generated in the following structure:

```
<link rel="(name)" href="(value)">
```

An option is also provided with the component:

- **Escape tag values?**: If ticked (default), the values inserted into the `href` attribute will be escaped using `htmlentities`. If this messes up your content, you can untick this to insert the raw content instead.

---

### For plugin developers

If you wish to use this plugin to provide meta and link tags on sites that your plugin is installed on, you can use the `\BennoThommo\Meta\Meta` and `\BennoThommo\Meta\Link` helper classes in your plugin.

These classes can be used up until the point in which the components above are rendered in October CMS.

#### Meta tags

To add a Meta tag, use the following line:

```
\BennoThommo\Meta\Meta::set('name', 'value')
```

where `name` is the name of the meta tag and `value` is the content of the meta tag.

You can also add several meta tags at once:

```
\BennoThommo\Meta\Meta::set([
    'name1' => 'value1',
    'name2' => 'value2'
]);
```

#### Link tags

To add a Link tag, use the following line:

```
\BennoThommo\Meta\Link::set('name', 'value')
```

where `name` is the name of the link tag and `value` is the href of the link tag.

You can also add several link tags at once:

```
\BennoThommo\Meta\Link::set([
    'name1' => 'value1',
    'name2' => 'value2'
]);
```