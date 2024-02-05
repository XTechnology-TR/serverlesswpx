exports.validate = function (response) {
  if (
    !process.env["FQDBDIR"] &&
    (!process.env["DATABASE"] ||
      !process.env["USERNAME"] ||
      !process.env["PASSWORD"] ||
      !process.env["HOST"])
  ) {
    if (process.env["SITE_NAME"]) {
      dashboardLink = `https://app.netlify.com/sites/${process.env["SITE_NAME"]}/settings/env`;
    } else if (process.env["VERCEL"]) {
      dashboardLink = "https://vercel.com/dashboard";
    } else {
      dashboardLink = "https://console.aws.amazon.com/console/home";
    }

    let message =
      "<p>Görünüşe göre WordPress veritabanı için gerekli ortam değişkenleri ayarlanmamış.</p>" +
      "<p>Henüz bir veritabanı oluşturmadıysanız şuraya gidin: <a href='https://planetscale.com'>PlanetScale</a> bir tane oluşturmak için.</p>" +
      `<p>Daha sonra siteniz için ortam değişkenlerini Vercel veya Netlify'da doldurmanız gerekecektir. (<a href="${dashboardLink}">Gösterge Paneli</a>)` +
      "<p>Gerekli değişkenler şunlardır:</p>" +
      `<pre><code>
            DATABASE
            USERNAME
            PASSWORD
            HOST
           </code></pre>` +
      "<p>Ardından <strong>site için güncellenecek ortam değişkenleri için sitenizi Vercel veya Netlifyda yeniden dağıtmayı unutmayın</strong>.</p>";

    return {
      statusCode: 500,
      headers: {
        "content-type": "text/html; charset=utf-8",
      },
      body: loadTemplate(message),
    };
  }
};

function loadTemplate(message) {
  return `
    <!doctype html>
    <html lang="tr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
        <title>SunucusuzWP WordPress Starter</title>
      </head>
      <body>
        <main class="container" style="width: 800px; margin: 0 auto">
          <h1>Neredeyse oradasın!</h1>
          ${message}
        </main>
      </body>
    </html>
    `;
}
