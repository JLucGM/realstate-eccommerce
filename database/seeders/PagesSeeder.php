<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'Terminos de servicio',
                'slug'  => 'terminos-de-servicio',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget eleifend metus. Phasellus auctor lectus feugiat, tincidunt lorem non, ornare ligula. Sed ac mauris suscipit, mattis massa quis, accumsan dolor. Nam eget dolor risus. Donec metus velit, suscipit id dictum nec, commodo non libero. Fusce faucibus ligula dapibus fermentum accumsan. Phasellus laoreet rutrum felis, in accumsan lacus aliquet in. Pellentesque sit amet lacus ultrices, tempus velit id, vulputate turpis. Donec posuere sapien vitae enim volutpat mattis. Proin dignissim augue velit, ut pharetra leo viverra quis.</p>

                <p>Donec ornare placerat aliquam. Praesent eleifend cursus purus, ac pellentesque eros vulputate sed. Cras ex felis, ultrices sed rhoncus in, egestas vitae orci. Phasellus vestibulum nunc quam, a facilisis ipsum varius at. Vestibulum sed porta velit. Nullam et purus sed mi tincidunt euismod ut vitae purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut metus purus.</p>
                
                <p>Aenean mi lectus, egestas ac quam et, ornare convallis ex. Donec augue eros, suscipit non egestas sed, dictum et lorem. Mauris dapibus eget neque in consectetur. Donec fermentum posuere quam at vestibulum. Aenean enim mi, efficitur ut pretium eget, lacinia quis ante. Cras lobortis eros massa, sit amet eleifend sem condimentum vitae. Quisque tincidunt elit in fermentum luctus. Donec vitae mattis mi, a fringilla diam. Praesent varius nec sem id ultricies. Nulla neque ipsum, consequat a vehicula eget, tincidunt ac felis. Nam pretium pulvinar varius. Curabitur volutpat lectus eget elit varius, nec molestie risus hendrerit. Maecenas fringilla nisi eu accumsan consectetur. Morbi malesuada euismod neque non auctor. Pellentesque fermentum augue lectus, ut vestibulum augue consequat at.</p>
                
                <p>Donec ac pharetra ex, ut porta est. Quisque feugiat metus leo, vitae lobortis augue mollis quis. Praesent accumsan, orci et mattis aliquet, ligula sapien commodo enim, nec faucibus nisl ipsum et quam. Nam viverra libero justo, et tincidunt lacus rhoncus eu. Suspendisse tristique tempus lectus et faucibus. Vivamus in nisl ut urna rhoncus dignissim eu non justo. Proin efficitur odio et efficitur gravida. Vivamus eget aliquet nunc, sit amet tempus orci. Proin faucibus non nisl quis feugiat. Curabitur non sem tristique, congue odio ut, pellentesque sapien. Aenean dignissim enim vitae lorem mattis, at dignissim orci blandit. Praesent et massa leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce lectus felis, accumsan sit amet viverra id, semper ut nibh.</p>
                
                <p>Vestibulum et mattis odio, et rutrum lacus. Morbi bibendum suscipit varius. Suspendisse maximus condimentum aliquet. Vivamus ut elit vitae augue laoreet efficitur in ac nibh. Phasellus non metus malesuada, venenatis dui nec, elementum nibh. Praesent feugiat, justo eu feugiat sagittis, odio orci porta purus, id consequat erat arcu vitae ligula. Vivamus quis ipsum ut ante scelerisque egestas vel a nulla. Etiam sit amet cursus libero, eget iaculis lacus. Donec vitae dui nec lacus sollicitudin consectetur vitae vel est. Nullam vitae convallis nunc.</p>
                
                <p>Cras dapibus tincidunt elit, sed ultricies purus luctus in. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida ex imperdiet neque ultrices porttitor. Vestibulum malesuada a ipsum sed lobortis. Integer accumsan turpis quis pretium scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus sem ac faucibus suscipit. Etiam vitae dui vel nisl faucibus tempus.</p>
                
                <p>Morbi facilisis velit ante. Praesent tincidunt in risus a aliquam. Aenean velit eros, aliquam in auctor sed, ultrices nec nisl. Nulla aliquet dictum venenatis. Vivamus ultrices laoreet mattis. Etiam vel nisl libero. Aenean bibendum, ante at pulvinar consequat, urna nunc aliquet purus, a luctus nisl dui in lorem. In vitae imperdiet neque. In hac habitasse platea dictumst. Vestibulum venenatis, enim egestas volutpat luctus, sem ante vehicula ligula, et viverra neque arcu vitae purus. Ut a facilisis erat. Integer venenatis fermentum tellus, et pellentesque sapien pulvinar id. In rutrum lacinia porta. In at quam metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam commodo ligula mollis dolor pretium, eu convallis eros tempor.</p>
                
                <p>Morbi at enim sit amet ex accumsan molestie. Maecenas posuere ligula vel lorem bibendum, eu mollis sem ornare. Maecenas aliquet interdum sodales. In sit amet ex molestie, sodales massa nec, vulputate purus. Morbi sapien turpis, rhoncus ut gravida nec, imperdiet eget nibh. Aenean varius molestie egestas. Praesent condimentum finibus justo, in viverra turpis. Donec fermentum libero ullamcorper, cursus felis eu, iaculis ex. Nulla iaculis cursus arcu, mattis lacinia risus tincidunt a. Vestibulum sed elit id est semper condimentum nec at metus.</p>
                
                <p>In tortor odio, tristique ac dapibus ac, sodales quis dolor. Donec ac metus quis ipsum dapibus tincidunt. Praesent mi lorem, egestas at finibus eget, tempor sed tellus. Praesent porta ullamcorper odio, eu tincidunt odio pulvinar quis. Aenean sed nisi tempus, porta nibh non, laoreet diam. Donec a justo magna. Integer scelerisque tincidunt vestibulum. Nam ultrices nec tellus et varius. In cursus enim eget lorem blandit consectetur. Ut sagittis consectetur massa, a dictum leo tempus ut. Duis sed condimentum mi. Nunc lorem augue, hendrerit in augue at, semper mattis nisi. Vestibulum feugiat mollis felis et placerat. Sed gravida elit nec ligula interdum, non consectetur dolor viverra.</p>
                
                <p>Duis malesuada, urna id dapibus ultricies, sapien leo auctor nibh, eget condimentum dui nibh vitae nisl. Donec et dignissim magna. Sed vestibulum, risus nec porta pharetra, elit ex cursus enim, sed tincidunt ex purus sit amet ligula. Sed scelerisque vulputate ullamcorper. Integer ac dui ut augue rhoncus porttitor at sit amet risus. Cras iaculis tellus eget urna sagittis, nec suscipit est dignissim. Donec et ante ac ipsum blandit laoreet a vitae libero. Nulla maximus arcu orci, a sollicitudin sem pulvinar ut.</p>',
                'status' => '0'
            ],            
            [
                'name' => 'Politicas de privacidad',
                'slug'  => 'politicas-de-privacidad',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget eleifend metus. Phasellus auctor lectus feugiat, tincidunt lorem non, ornare ligula. Sed ac mauris suscipit, mattis massa quis, accumsan dolor. Nam eget dolor risus. Donec metus velit, suscipit id dictum nec, commodo non libero. Fusce faucibus ligula dapibus fermentum accumsan. Phasellus laoreet rutrum felis, in accumsan lacus aliquet in. Pellentesque sit amet lacus ultrices, tempus velit id, vulputate turpis. Donec posuere sapien vitae enim volutpat mattis. Proin dignissim augue velit, ut pharetra leo viverra quis.</p>

                <p>Donec ornare placerat aliquam. Praesent eleifend cursus purus, ac pellentesque eros vulputate sed. Cras ex felis, ultrices sed rhoncus in, egestas vitae orci. Phasellus vestibulum nunc quam, a facilisis ipsum varius at. Vestibulum sed porta velit. Nullam et purus sed mi tincidunt euismod ut vitae purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut metus purus.</p>
                
                <p>Aenean mi lectus, egestas ac quam et, ornare convallis ex. Donec augue eros, suscipit non egestas sed, dictum et lorem. Mauris dapibus eget neque in consectetur. Donec fermentum posuere quam at vestibulum. Aenean enim mi, efficitur ut pretium eget, lacinia quis ante. Cras lobortis eros massa, sit amet eleifend sem condimentum vitae. Quisque tincidunt elit in fermentum luctus. Donec vitae mattis mi, a fringilla diam. Praesent varius nec sem id ultricies. Nulla neque ipsum, consequat a vehicula eget, tincidunt ac felis. Nam pretium pulvinar varius. Curabitur volutpat lectus eget elit varius, nec molestie risus hendrerit. Maecenas fringilla nisi eu accumsan consectetur. Morbi malesuada euismod neque non auctor. Pellentesque fermentum augue lectus, ut vestibulum augue consequat at.</p>
                
                <p>Donec ac pharetra ex, ut porta est. Quisque feugiat metus leo, vitae lobortis augue mollis quis. Praesent accumsan, orci et mattis aliquet, ligula sapien commodo enim, nec faucibus nisl ipsum et quam. Nam viverra libero justo, et tincidunt lacus rhoncus eu. Suspendisse tristique tempus lectus et faucibus. Vivamus in nisl ut urna rhoncus dignissim eu non justo. Proin efficitur odio et efficitur gravida. Vivamus eget aliquet nunc, sit amet tempus orci. Proin faucibus non nisl quis feugiat. Curabitur non sem tristique, congue odio ut, pellentesque sapien. Aenean dignissim enim vitae lorem mattis, at dignissim orci blandit. Praesent et massa leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce lectus felis, accumsan sit amet viverra id, semper ut nibh.</p>
                
                <p>Vestibulum et mattis odio, et rutrum lacus. Morbi bibendum suscipit varius. Suspendisse maximus condimentum aliquet. Vivamus ut elit vitae augue laoreet efficitur in ac nibh. Phasellus non metus malesuada, venenatis dui nec, elementum nibh. Praesent feugiat, justo eu feugiat sagittis, odio orci porta purus, id consequat erat arcu vitae ligula. Vivamus quis ipsum ut ante scelerisque egestas vel a nulla. Etiam sit amet cursus libero, eget iaculis lacus. Donec vitae dui nec lacus sollicitudin consectetur vitae vel est. Nullam vitae convallis nunc.</p>
                
                <p>Cras dapibus tincidunt elit, sed ultricies purus luctus in. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida ex imperdiet neque ultrices porttitor. Vestibulum malesuada a ipsum sed lobortis. Integer accumsan turpis quis pretium scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus sem ac faucibus suscipit. Etiam vitae dui vel nisl faucibus tempus.</p>
                
                <p>Morbi facilisis velit ante. Praesent tincidunt in risus a aliquam. Aenean velit eros, aliquam in auctor sed, ultrices nec nisl. Nulla aliquet dictum venenatis. Vivamus ultrices laoreet mattis. Etiam vel nisl libero. Aenean bibendum, ante at pulvinar consequat, urna nunc aliquet purus, a luctus nisl dui in lorem. In vitae imperdiet neque. In hac habitasse platea dictumst. Vestibulum venenatis, enim egestas volutpat luctus, sem ante vehicula ligula, et viverra neque arcu vitae purus. Ut a facilisis erat. Integer venenatis fermentum tellus, et pellentesque sapien pulvinar id. In rutrum lacinia porta. In at quam metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam commodo ligula mollis dolor pretium, eu convallis eros tempor.</p>
                
                <p>Morbi at enim sit amet ex accumsan molestie. Maecenas posuere ligula vel lorem bibendum, eu mollis sem ornare. Maecenas aliquet interdum sodales. In sit amet ex molestie, sodales massa nec, vulputate purus. Morbi sapien turpis, rhoncus ut gravida nec, imperdiet eget nibh. Aenean varius molestie egestas. Praesent condimentum finibus justo, in viverra turpis. Donec fermentum libero ullamcorper, cursus felis eu, iaculis ex. Nulla iaculis cursus arcu, mattis lacinia risus tincidunt a. Vestibulum sed elit id est semper condimentum nec at metus.</p>
                
                <p>In tortor odio, tristique ac dapibus ac, sodales quis dolor. Donec ac metus quis ipsum dapibus tincidunt. Praesent mi lorem, egestas at finibus eget, tempor sed tellus. Praesent porta ullamcorper odio, eu tincidunt odio pulvinar quis. Aenean sed nisi tempus, porta nibh non, laoreet diam. Donec a justo magna. Integer scelerisque tincidunt vestibulum. Nam ultrices nec tellus et varius. In cursus enim eget lorem blandit consectetur. Ut sagittis consectetur massa, a dictum leo tempus ut. Duis sed condimentum mi. Nunc lorem augue, hendrerit in augue at, semper mattis nisi. Vestibulum feugiat mollis felis et placerat. Sed gravida elit nec ligula interdum, non consectetur dolor viverra.</p>
                
                <p>Duis malesuada, urna id dapibus ultricies, sapien leo auctor nibh, eget condimentum dui nibh vitae nisl. Donec et dignissim magna. Sed vestibulum, risus nec porta pharetra, elit ex cursus enim, sed tincidunt ex purus sit amet ligula. Sed scelerisque vulputate ullamcorper. Integer ac dui ut augue rhoncus porttitor at sit amet risus. Cras iaculis tellus eget urna sagittis, nec suscipit est dignissim. Donec et ante ac ipsum blandit laoreet a vitae libero. Nulla maximus arcu orci, a sollicitudin sem pulvinar ut.</p>',
                'status' => '0'
            ],            
            [
                'name' => 'Sobre nosotros',
                'slug'  => 'sobre-nosotros',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget eleifend metus. Phasellus auctor lectus feugiat, tincidunt lorem non, ornare ligula. Sed ac mauris suscipit, mattis massa quis, accumsan dolor. Nam eget dolor risus. Donec metus velit, suscipit id dictum nec, commodo non libero. Fusce faucibus ligula dapibus fermentum accumsan. Phasellus laoreet rutrum felis, in accumsan lacus aliquet in. Pellentesque sit amet lacus ultrices, tempus velit id, vulputate turpis. Donec posuere sapien vitae enim volutpat mattis. Proin dignissim augue velit, ut pharetra leo viverra quis.</p>

                <p>Donec ornare placerat aliquam. Praesent eleifend cursus purus, ac pellentesque eros vulputate sed. Cras ex felis, ultrices sed rhoncus in, egestas vitae orci. Phasellus vestibulum nunc quam, a facilisis ipsum varius at. Vestibulum sed porta velit. Nullam et purus sed mi tincidunt euismod ut vitae purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut metus purus.</p>
                
                <p>Aenean mi lectus, egestas ac quam et, ornare convallis ex. Donec augue eros, suscipit non egestas sed, dictum et lorem. Mauris dapibus eget neque in consectetur. Donec fermentum posuere quam at vestibulum. Aenean enim mi, efficitur ut pretium eget, lacinia quis ante. Cras lobortis eros massa, sit amet eleifend sem condimentum vitae. Quisque tincidunt elit in fermentum luctus. Donec vitae mattis mi, a fringilla diam. Praesent varius nec sem id ultricies. Nulla neque ipsum, consequat a vehicula eget, tincidunt ac felis. Nam pretium pulvinar varius. Curabitur volutpat lectus eget elit varius, nec molestie risus hendrerit. Maecenas fringilla nisi eu accumsan consectetur. Morbi malesuada euismod neque non auctor. Pellentesque fermentum augue lectus, ut vestibulum augue consequat at.</p>
                
                <p>Donec ac pharetra ex, ut porta est. Quisque feugiat metus leo, vitae lobortis augue mollis quis. Praesent accumsan, orci et mattis aliquet, ligula sapien commodo enim, nec faucibus nisl ipsum et quam. Nam viverra libero justo, et tincidunt lacus rhoncus eu. Suspendisse tristique tempus lectus et faucibus. Vivamus in nisl ut urna rhoncus dignissim eu non justo. Proin efficitur odio et efficitur gravida. Vivamus eget aliquet nunc, sit amet tempus orci. Proin faucibus non nisl quis feugiat. Curabitur non sem tristique, congue odio ut, pellentesque sapien. Aenean dignissim enim vitae lorem mattis, at dignissim orci blandit. Praesent et massa leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce lectus felis, accumsan sit amet viverra id, semper ut nibh.</p>
                
                <p>Vestibulum et mattis odio, et rutrum lacus. Morbi bibendum suscipit varius. Suspendisse maximus condimentum aliquet. Vivamus ut elit vitae augue laoreet efficitur in ac nibh. Phasellus non metus malesuada, venenatis dui nec, elementum nibh. Praesent feugiat, justo eu feugiat sagittis, odio orci porta purus, id consequat erat arcu vitae ligula. Vivamus quis ipsum ut ante scelerisque egestas vel a nulla. Etiam sit amet cursus libero, eget iaculis lacus. Donec vitae dui nec lacus sollicitudin consectetur vitae vel est. Nullam vitae convallis nunc.</p>
                
                <p>Cras dapibus tincidunt elit, sed ultricies purus luctus in. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida ex imperdiet neque ultrices porttitor. Vestibulum malesuada a ipsum sed lobortis. Integer accumsan turpis quis pretium scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus sem ac faucibus suscipit. Etiam vitae dui vel nisl faucibus tempus.</p>
                
                <p>Morbi facilisis velit ante. Praesent tincidunt in risus a aliquam. Aenean velit eros, aliquam in auctor sed, ultrices nec nisl. Nulla aliquet dictum venenatis. Vivamus ultrices laoreet mattis. Etiam vel nisl libero. Aenean bibendum, ante at pulvinar consequat, urna nunc aliquet purus, a luctus nisl dui in lorem. In vitae imperdiet neque. In hac habitasse platea dictumst. Vestibulum venenatis, enim egestas volutpat luctus, sem ante vehicula ligula, et viverra neque arcu vitae purus. Ut a facilisis erat. Integer venenatis fermentum tellus, et pellentesque sapien pulvinar id. In rutrum lacinia porta. In at quam metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam commodo ligula mollis dolor pretium, eu convallis eros tempor.</p>
                
                <p>Morbi at enim sit amet ex accumsan molestie. Maecenas posuere ligula vel lorem bibendum, eu mollis sem ornare. Maecenas aliquet interdum sodales. In sit amet ex molestie, sodales massa nec, vulputate purus. Morbi sapien turpis, rhoncus ut gravida nec, imperdiet eget nibh. Aenean varius molestie egestas. Praesent condimentum finibus justo, in viverra turpis. Donec fermentum libero ullamcorper, cursus felis eu, iaculis ex. Nulla iaculis cursus arcu, mattis lacinia risus tincidunt a. Vestibulum sed elit id est semper condimentum nec at metus.</p>
                
                <p>In tortor odio, tristique ac dapibus ac, sodales quis dolor. Donec ac metus quis ipsum dapibus tincidunt. Praesent mi lorem, egestas at finibus eget, tempor sed tellus. Praesent porta ullamcorper odio, eu tincidunt odio pulvinar quis. Aenean sed nisi tempus, porta nibh non, laoreet diam. Donec a justo magna. Integer scelerisque tincidunt vestibulum. Nam ultrices nec tellus et varius. In cursus enim eget lorem blandit consectetur. Ut sagittis consectetur massa, a dictum leo tempus ut. Duis sed condimentum mi. Nunc lorem augue, hendrerit in augue at, semper mattis nisi. Vestibulum feugiat mollis felis et placerat. Sed gravida elit nec ligula interdum, non consectetur dolor viverra.</p>
                
                <p>Duis malesuada, urna id dapibus ultricies, sapien leo auctor nibh, eget condimentum dui nibh vitae nisl. Donec et dignissim magna. Sed vestibulum, risus nec porta pharetra, elit ex cursus enim, sed tincidunt ex purus sit amet ligula. Sed scelerisque vulputate ullamcorper. Integer ac dui ut augue rhoncus porttitor at sit amet risus. Cras iaculis tellus eget urna sagittis, nec suscipit est dignissim. Donec et ante ac ipsum blandit laoreet a vitae libero. Nulla maximus arcu orci, a sollicitudin sem pulvinar ut.</p>',
                'status' => '0'
            ],            
        ];

        foreach ($pages as $pagesData) {
            Page::create($pagesData);
        }
    }
}