<?php

namespace App\Http\Controllers\Site;

use App\Constants\GenderConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserEmailRequest;
use App\Http\Requests\UserCreateNewPasswordRequest;
use App\Http\Requests\UserDocumentRequest;
use App\Http\Requests\UserSettingsUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class UserController
 * @package App\Http\Controllers\Site
 */
class UserController extends Controller
{
    /** @var UserService $userService */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * User's profile settings page
     * @return Factory|View
     */
    public function settings()
    {
        /** @var User $user */
        $user = auth()->user();
        return view("gzone.pages.settings", [
            "user" => $user,
            "documents" => $user->getMedia("user_documents"),
            "genders" => GenderConstant::translateList()
        ]);
    }

    public function update(UserSettingsUpdateRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $this->userService->updateUserInformation($user, $request->validated());
        return redirect()->route("user.settings");
    }

    /**
     * @param NewUserEmailRequest $request
     * @return RedirectResponse
     */
    public function changeEmail(NewUserEmailRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $this->userService->changeEmailForUser($user, $request->validated());
        return redirect()->route("user.settings");
    }

    /**
     * @param UserDocumentRequest $request
     * @return RedirectResponse
     */
    public function addFile(UserDocumentRequest $request)
    {
        $file = $this->userService->addUserDocument($request->validated());
        return response()->json([
            "id" => $file->id,
            "file_name" => $file->file_name
        ]);
    }

    /**
     * Delete user`s document
     * @param Media $media
     */
    public function deleteFile(Media $media)
    {
        $media->delete();
    }

    /**
     * @param UserCreateNewPasswordRequest $request
     * @return RedirectResponse
     */
    public function changePassword(UserCreateNewPasswordRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $this->userService->recoverPassword($user, $request->validated());
        return redirect()->route("user.settings");
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->userService->deleteAccount();
        return redirect()->route("site.index");
    }
}
