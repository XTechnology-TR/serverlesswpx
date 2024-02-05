# WordPress'i Vercel, Netlify veya AWS'de Barındırın

WordPress barındırma aptalca. Vercel, Netlify veya AWS Lambda'da Sunucusuz WordPress.

| Vercel (önerilen)                                                                                                                                                                                                                                                                                                                                                                                                 | Netlify                                                                                                                                                         | AWS with Serverless Framework      |
| ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------- |
| [![Deploy with Vercel](https://vercel.com/button)](https://vercel.com/new/clone?repository-url=https%3A%2F%2Fgithub.com%2Fmitchmac%2Fserverlesswp&env=DATABASE,USERNAME,PASSWORD,HOST&envDescription=Database%20credentials%20from%20PlanetScale%20or%20other%20host&envLink=https%3A%2F%2Fgithub.com%2Fmitchmac%2FServerlessWP%23setup-vercel-or-netlify&project-name=serverlesswp&repository-name=serverlesswp) | [![Deploy to Netlify](https://www.netlify.com/img/deploy/button.svg)](https://app.netlify.com/start/deploy?repository=https://github.com/mitchmac/serverlesswp) | `npm install && serverless deploy` |

###Hızlı kurulum videosu

[![](https://markdown-videos.vercel.app/youtube/A1HZB2OqpCY)](https://youtu.be/A1HZB2OqpCY)

## Proje hedefleri

✅ WordPress sunucularının bakımını yapmak zahmetli olabilir. Sunucusuz barındırma daha az iş gerektirecektir.

✅ Küçük WordPress sitelerinin barındırılmasının çok fazla (veya hiçbir şey) maliyeti olmamalıdır. **Vercel, Netlify, AWS ve PlanetScale'in ücretsiz katmanları vardır**.

✅ WordPress eklentileri ve temaları zamandan tasarruf sağlar ve kapsamlı bir şekilde desteklenmelidir.

✅ Kenar önbelleğe alma bize son derece hızlı web siteleri sağlayabilir.

✅ WordPress web sitelerinin karbon ayak izini azaltabiliriz.
✅ Yardımsever bir topluluk oluşturabiliriz. Tartışmalarda [Başarılarınızı, bilgilerinizi, fikirlerinizi veya mücadelelerinizi paylaşın](https://github.com/mitchmac/ServerlessWP/discussions).

## SunucusuzWP'yi Dağıtma

**Bu şu anda deneysel bir projedir ve henüz önemli ölçüde güvenlik veya istikrarın gerekli olduğu durumlarda kullanılmamalıdır**

1. **Vercel veya Netlify'dan erişilebilen bir MySQL veritabanı oluşturun**.

Bunu yapmanın en kolay yolu, başlangıç ​​için ücretsiz bir katmana sahip olan [PlanetScale](https://planetscale.com/) kullanmaktır. PlanetScale kullanırken veritabanınızın bölgesinin Vercel veya Netlify'ın kullanacağı bölgeyle eşleştiğinden emin olun. Bu genellikle `us-east-1`dir.

2. **Bu depoyu Vercel, Netlify veya AWS'ye dağıtın.**

Yukarıdaki bağlantılardan biri başlamanıza yardımcı olacaktır. Sadece bir GitHub hesabına ihtiyacınız olacak.

Sunucusuz Çerçeve ile AWS'ye ilk kez dağıtım yapıyorsanız, hızlanmak ve "sunucusuz" çalıştırmak için [Sunucusuz Çerçeve belgelerini](https://www.serverless.com/framework/docs/getting-started) kontrol edin. hazır olduğunuzda konuşlandırın.

3. Vercel veya Netlify'daki projeniz için \*\*ortam değişkenlerini PlanetScale'den veya MySQL veritabanını barındırdığınız her yerden veritabanı kimlik bilgileriyle güncelleyin. WordPress yapılandırma dosyası `wp-config.php` veritabanına bağlanmak için bu değerleri kullanır. Ortam değişkenleri şunlardır:

- DATABASE
- USERNAME
- PASSWORD
- HOST

Ortam değişkenleri oluşturma hakkında daha fazla bilgi için [Vercel için burada](https://vercel.com/docs/concepts/projects/environment-variables) ve [Netlify için burada](https://docs.netlify.com/) bölümlerine bakın. ortam değişkenleri/genel bakış/). Projenizi ilk kez dağıttıktan sonra güncellerseniz, ortam değişkenlerini güncelledikten sonra projenizi yeniden dağıtmayı unutmayın.

4. (isteğe bağlı, daha sonra yapılabilir) Dosya ve medya yüklemeleri, Amazon S3 için birlikte verilen WP Offload Media Lite eklentisi kullanılarak etkinleştirilebilir. S3 kurulum ayrıntılarına [burada](https://deliciousbrains.com/wp-offload-media/doc/amazon-s3-quick-start-guide/) ulaşabilirsiniz. wp-config.php dosyası, eklenti tarafından kullanılmak üzere aşağıdaki ortam değişkenlerini kullanacak şekilde ayarlanmıştır:
   -S3_KEY_ID
   -S3_ACCESS_KEY

## WordPress'i özelleştirme

- WordPress ve dosyaları `/wp` dizinindedir. Eklentileri veya temaları `wp-content` içindeki ilgili dizinlerine ekleyebilirsiniz. -[Cache-Control](https://wordpress.org/plugins/cache-control/) gibi eklentiler, s-maxage direktifiyle CDN önbelleğe almayı etkinleştirebilir ve sitenizi süper hızlı hale getirebilir. [Vercel Edge Caching ](https://vercel.com/docs/concepts/edge-network/caching) veya [ Netlfiy Cache Headers](https://docs.netlify.com/edge-functions/Optional-configuration) bölümüne bakın. /#desteklenen-başlıklar)

## Proje yapısı

-``netlify.toml` veya `vercel.json`, tüm istekleri işlemek için ```/api/index.js````yi yapılandırdığımız yerdir

- [mitchmac/serverlesswp-node](https://github.com/mitchmac/serverlesswp-node) is used PHP'yi çalıştırmak ve isteği işlemek için
  -Gelen isteği api/index.js'deki `event` nesnesi aracılığıyla değiştirebilirsiniz. Ayrıca burada WordPress `response` nesnesini de değiştirebilirsiniz.

## Yardım almak

ServerlessWP'yi kurma konusunda yardıma mı ihtiyacınız var? [Bir tartışma başlatın](https://github.com/mitchmac/ServerlessWP/discussions) veya [Mitch'e e-posta gönderin](mailto:wp@mitchmac.dev)

## Nasıl yardımcı olabilirsin?

-Sadece ServerlessWP'yi kullanmak ve [yaşadığınız sorunları bildirmek](https://github.com/mitchmac/ServerlessWP/issues) yardım etmenin harika bir yoludur!
-Haberi yayın! WordPress barındırma işlemini daha iyi hale getirmeye çalışalım.

## Lisans

GNU General Public License v3.0
