<form action="date.php" method="post" id="date">
    <fieldset>
        <div class="control-group">
            <input name="movie1" id="movie1" placeholder="First movie preference" type="text" />
        </div>
        <div class="control-group">
            <input name="movie2" id="movie2" placeholder="Second movie preference" type="text" />
        </div>
        <div class="control-group">
            <input name="movie3" id="movie3" placeholder="Third movie preference" type="text" />
        </div>
        <div class="control-group">
            <p>Where at?</p>
            <select name="location">
                <option value="0">Your place</option>
                <option value="1">Their place</option>
            </select>
        </div>
        <div class="control-group">
            <select name="pay">
                <option value="0">Let's split the cost</option>
                <option value="1">This movie's on me</option>
            </select>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Match me up</button>
        </div>
    </fieldset>
</form>
