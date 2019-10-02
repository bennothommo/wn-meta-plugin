# Meta plugin

Provides an easy interface to allow October CMS plugins to insert HTML `<meta>` and `<link>` tags, as well as JSON-LD blocks into a layout or page. The plugin provides three helper classes to populate the meta and link tags or JSON-LD blocks, and a component each to inject them into an October CMS layout, partial or page file.

## Usage

### For theme developers

Three components are provided to inject the meta and link tags or JSON-LD blocks into your theme - **metaList**, **linkList** and **jsonLdList**.

#### Meta tags

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

#### JSON-LD blocks

Add the **Meta -> JSON-LD List** component to your page and add the following line where you would like the JSON-LD blocks to be inserted. As above, this should also preferably be inside the `<head>` tag, beneath all `<meta>` and `<link>` tags.

```
{% component 'jsonLdList' %}
```

JSON-LD blocks will be generated in the following structure:

```
<script type="application/ld+json">
    (value)
</script>
```

An option is also provided with the component:

- **Escape JSON-LD content?**: If ticked (default), the values inserted into the JSON-LD content blocks will be escaped using `htmlentities`. If this messes up your content - especially in the case of HTML content, you can untick this to insert the raw content instead.

---

### For plugin developers

If you wish to use this plugin to provide meta and link tags or JSON-LD block content on sites that your plugin is installed on, you can use the `\BennoThommo\Meta\Meta`, `\BennoThommo\Meta\Link` and `\BennoThommo\Meta\JsonLd` helper classes in your plugin.

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

Note that only one value can be used per `name`. If the same name is used in a more recent call to the helper, the given value will overwrite any previous values.

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

Note that only one value can be used per `name`. If the same name is used in a more recent call to the helper, the given value will overwrite any previous values.

#### JSON-LD blocks

To add a JSON-LD block, use the following line:

```
\BennoThommo\Meta\JsonLd::set('name', '{key: value}')
```

where `name` is the name of the JSON-LD block and `value` is the JSON-encoded content you wish to use in the block.

All provided values will be checked to ensure they are valid JSON - if a value provided is not valid JSON content, an `ApplicationException` will be thrown.

You can also add several JSON-LD blocks at once:

```
\BennoThommo\Meta\JsonLd::set([
    'name1' => '{key1: value1}',
    'name2' => '{key2: value2}'
]);
```