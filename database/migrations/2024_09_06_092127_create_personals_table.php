use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // e.g., 'Hobby', 'Interest', etc.
            $table->text('description')->nullable(); // Optional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
