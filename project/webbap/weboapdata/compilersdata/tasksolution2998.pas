Program HanoiTower;
Type Rod = 1..3;
Var
    N : Byte;
    F, T : Rod;

Procedure MoveTower(FromRod, ToRod : Rod; Quantity : Byte);
Var ExtraRod : Rod;
    Begin
        If Quantity = 1
        Then
            WriteLn(FromRod, ' ', ToRod)
        Else
            Begin
                ExtraRod := 6 - FromRod - ToRod;
                MoveTower(FromRod, ExtraRod, Quantity - 1);
                MoveTower(FromRod, ToRod, 1);
                MoveTower(ExtraRod, ToRod, Quantity - 1)
            End
    End;

Begin
    ReadLn(N, F, T);
    MoveTower(F, T, N)
End.