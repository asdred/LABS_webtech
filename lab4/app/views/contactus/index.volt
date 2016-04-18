<form class="contact_form" action="/report/add" method="post" name="contact_form">
        <ul>
            <li>
                <h2>ООО "ООО". Техническая поддержка.</h2>
                <span class="required_notification">* Обозначает поля обязательные для заполнения</span>
            </li>
            <li>
                <label for="name">Имя:</label>
                <input type="text" name="name" placeholder="Михаил" required />
            </li>
            <li>
                <label for="sname">Фамилия:</label>
                <input type="text" name="sname" placeholder="Стругов" required />
            </li>
            <li>
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="laikaboss@mail.com" required />
                <span class="form_hint">Действительный формат text@text</span>
            </li>
            <li>
                <label for="website">Сайт:</label>
                <input type="url" name="website" placeholder="http://laikaboss.com" required pattern="(http|https)://.+" />
                <span class="form_hint">Proper format "http://someaddress.com"</span>
            </li>
            <li>
                <label for="message">Проблема:</label>
                <textarea name="message" cols="40" rows="6" required ></textarea>
            </li>
            <li>
                <button class="submit" type="submit">Отправить</button>
            </li>
        </ul>
</form>