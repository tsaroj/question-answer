export default {
    modify (User, model) {
        return user.id === model.user_id;
    },

    accept (User, answer) {
        return user.id === answer.question.user_id;
    }
}
