<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $common = [
            "home.view",
            "dashboard.view",
            "content.read",
            "review.create",
            "review.read",
        ];

        // Role: User
        $userPermissions = array_merge($common, [
            // Profile management
            "user.profile.view",
            "user.profile.update",
            "user.photo.upload",
            // List of content they have reviewed
            "content.reviewed.list",
        ]);
        Role::create([
            'name' => 'User',
            'permission' => json_encode($userPermissions),
        ]);

        // Role: Contributor (all User perms + content authoring + topic requests)
        $contribPermissions = array_merge($userPermissions, [
            // Can create/edit/delete their own content
            "content.create.own",
            "content.update.own",
            "content.delete.own",
            // Request new topics/subtopics
            "topic.request",
            "subtopic.request",
            // View their contributions in dashboard
            "dashboard.contributions.view",
        ]);
        Role::create([
            'name' => 'Contributor',
            'permission' => json_encode($contribPermissions),
        ]);

        // Role: Admin (full CRUD on users/content/topics/subtopics, plus approvals)
        $adminPermissions = array_merge($common, [
            // Dashboard management view (admin)
            "dashboard.admin.view",
            // Profile management (admin can also update own profile)
            "user.profile.view",
            "user.profile.update",
            "user.photo.upload",
            // Content reviewing (see list of reviewed content)
            "content.reviewed.list",
            // Full content management (any content)
            "content.create.any",
            "content.update.any",
            "content.delete.any",
            "review.delete.any",
            // User management
            "user.create",
            "user.read",
            "user.update",
            "user.delete",
            // Topic management
            "topic.create",
            "topic.read",
            "topic.update",
            "topic.delete",
            // Subtopic management
            "subtopic.create",
            "subtopic.read",
            "subtopic.update",
            "subtopic.delete",
            // Topic/subtopic request and approval
            "topic.request",
            "subtopic.request",
            "topic.approve",
            "subtopic.approve",
        ]);
        Role::create([
            'name' => 'Admin',
            'permission' => json_encode($adminPermissions),
        ]);
    }
}
