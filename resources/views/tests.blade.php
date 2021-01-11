

<?php
$str = 'Hello @toni and @sukaina this event is @tomeu promoted by @universe_2000';
echo insertUsersLinks($str);

/**
 * Given raw text replaces the usernames for links to their profile page
 * @param string $text raw text with usernames
 * @return string text where the usernames (strings starting with @) have been replaced with their respective links (anchor tag)
 */
function insertUsersLinks(string $text)
{
    preg_match_all('/@(?<username>\S+)/', $text, $matches);
    $usernames = $matches['username'];
    foreach ($usernames as $username) {
        $userPageLink = '<a href="' . $username . '">@' . $username . '</a>';
        $text = preg_replace('/@' . $username . '/', $userPageLink, $text);
    }
    return $text;
}


?>