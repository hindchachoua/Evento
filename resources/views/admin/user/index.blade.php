

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-left: 250px">
                <h1 class="text-center mt-5 mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">All Users:</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-bordered table table-dark table-hover table-striped table-responsive w-full text-lg text-gray-500 dark:text-gray-400" style="background-color: rgb(58, 25, 61)">
                        <tbody>
                            @foreach($userwithuserrole as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success"><a href="">Edit</a></button>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Archive</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


