from datetime import datetime

class TaskNode:
    def __init__(self, task_name, assignee=None, deadline=None, priority=None):
        self.task_name = task_name
        self.assignee = assignee
        self.deadline = deadline
        self.priority = priority
        self.next = None


class TaskScheduler:
    def __init__(self):
        self.tasks = []  # List to hold input tasks
        self.users = ["Morales", "Sharmaine", "Rufo", "Esto"]  # Fixed user order
        self.user_index = 0  # Start with Morales

    def add_task(self, task_name, deadline=None, priority=None):
        # Add task to the list before sorting
        new_task = TaskNode(task_name, None, deadline, priority)
        self.tasks.append(new_task)

    def remove_task(self, task_name):
        # Remove task based on task name
        for i, task in enumerate(self.tasks):
            if task.task_name == task_name:
                self.tasks.pop(i)
                return
        print(f"Task '{task_name}' not found.")

    def display_tasks(self):
        if not self.tasks:
            print("No tasks available.")
            return

        # Sort tasks by deadline (month-day-year) and then by priority (if any)
        def parse_date(date_string):
            if date_string:
                # Check if the year is in two-digit format and convert to four digits
                if len(date_string.split("-")[2]) == 2:
                    date_string = date_string[:6] + "20" + date_string[6:]
                return datetime.strptime(date_string, "%m-%d-%Y")
            return datetime.max
        
        # Sort tasks by deadline
        self.tasks.sort(key=lambda x: parse_date(x.deadline))

        # Distribute tasks to users in round-robin fashion
        for task in self.tasks:
            task.assignee = self.users[self.user_index]
            self.user_index = (self.user_index + 1) % len(self.users)

        # Group tasks by assignee
        tasks_by_assignee = {user: [] for user in self.users}

        for task in self.tasks:
            tasks_by_assignee[task.assignee].append(task)

        # Display tasks for each user
        for assignee in self.users:
            if tasks_by_assignee[assignee]:
                print(f"\nAssigned to: {assignee}")
                print("All Tasks assigned:")
                for task in tasks_by_assignee[assignee]:
                    print(f"Task: {task.task_name}")
                    print(f"Deadline: {task.deadline if task.deadline else 'No deadline'}")
                    print(f"Priority: {task.priority if task.priority is not None else 'No priority'}")
                    print("-" * 30)

    def mark_task_done(self, task_name):
        for i, task in enumerate(self.tasks):
            if task.task_name == task_name:
                print(f"Task '{task_name}' is done and removed from the schedule.")
                self.tasks.pop(i)
                return
        print(f"Task '{task_name}' not found.")

    def run(self):
        while True:
            print("\n--- Task Scheduler ---")
            print("1. Add Task")
            print("2. Remove Task")
            print("3. Display Tasks")
            print("4. Mark Task as Done")
            print("5. Exit")
            choice = input("Enter your choice (1-5): ")
            if choice == "1":
                task_name = input("Enter task name: ")
                deadline = input("Enter deadline (mm-dd-yyyy or leave blank if none): ")
                priority_input = input("Enter priority (or leave blank if none): ")
                priority = None if not priority_input else int(priority_input)
                self.add_task(task_name, deadline, priority)

            elif choice == "2":
                task_name = input("Enter task name to remove: ")
                self.remove_task(task_name)

            elif choice == "3":
                self.display_tasks()

            elif choice == "4":
                task_name = input("Enter task name to mark as done: ")
                self.mark_task_done(task_name)

            elif choice == "5":
                print("Exiting Task Scheduler...")
                break

            else:
                print("Invalid choice, please try again.")


if __name__ == "__main__":
    scheduler = TaskScheduler()
    scheduler.run()  # Start the task scheduler and allow user to add tasks dynamically
