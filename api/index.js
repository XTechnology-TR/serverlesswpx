const serverlesswp = require("serverlesswp");

const { validate } = require("../util/install.js");
const { setup } = require("../util/directory.js");

//WordPress'e yapılan tüm isteklerin yönlendirildiği yer burasıdır. Yönlendirme kuralları için vercel.json veya netlify.toml'a bakın.
exports.handler = async function (event, context, callback) {
  //Yazılabilir olması için /wp dizinini /tmp/wp dizinine taşıyın.
  setup();

  //İsteği (olay nesnesini) sunucusuz wp kitaplığına gönder. WordPress'in isteği işlemesine izin veren PHP sunucusunu içerir.
  let response = await serverlesswp({ docRoot: "/tmp/wp", event: event });
  // Veritabanı ortamı değişkenlerinin yerinde olup olmadığını kontrol edin.
  let checkInstall = validate(response);

  if (checkInstall) {
    return checkInstall;
  } else {
    // Sunum için yanıtı döndürün.
    return response;
  }
};
